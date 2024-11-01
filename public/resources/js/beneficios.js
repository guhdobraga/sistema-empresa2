document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('input[type="checkbox"]');
    const funcionarioId = obterFuncionarioIdDaUrl();

    function obterValoresAtuaisDoBanco() {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `obter_beneficios.php?id=${funcionarioId}`, true);

        xhr.onload = function() {
            if (xhr.status === 200) {
                const beneficios = JSON.parse(xhr.responseText);
                console.log('Benefícios obtidos do banco de dados:', beneficios);

                checkboxes.forEach(checkbox => {
                    const beneficioId = checkbox.getAttribute('data-id');
                    const valorNoBanco = beneficios[beneficioId];
                    console.log(`Benefício: ${beneficioId}, Valor no Banco: ${valorNoBanco}`);

                    checkbox.checked = (valorNoBanco === '1'); // Verifica se deve marcar a checkbox
                });
            } else {
                console.error('Erro ao obter os benefícios do banco de dados');
            }
        };

        xhr.send();
    }

    obterValoresAtuaisDoBanco();

    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('click', function() {
            const beneficioId = this.getAttribute('data-id');
            const isChecked = this.checked;
            console.log(`Checkbox ${beneficioId} clicada, isChecked: ${isChecked}`);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'atualizar_beneficio.php', true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

            const params = `funcionarioId=${funcionarioId}&beneficioId=${beneficioId}&isChecked=${isChecked ? '1' : '0'}`;
            console.log('Parâmetros da requisição:', params);

            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Resposta do servidor:', xhr.responseText);
                } else {
                    console.error('Erro ao atualizar o benefício');
                }
            };

            xhr.send(params);
        });
    });
});
function obterFuncionarioIdDaUrl() {
    const urlParams = new URLSearchParams(window.location.search);
    return urlParams.get('id');
}