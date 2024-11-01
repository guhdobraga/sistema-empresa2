
    const metodoPagamento = document.getElementById('metodoPagamento');
    const cartaoDetails = document.getElementById('cartaoDetails');
    const cartaoDetails1 = document.getElementById('cartaoDetails1');
    const cartaoDetails2 = document.getElementById('cartaoDetails2');
    const rzz = document.getElementById('rzz');
    const chequeDinheiroDetails = document.getElementById('chequeDinheiroDetails');
    const chequeDinheiroDetails1 = document.getElementById('chequeDinheiroDetails1');
    const chequeDinheiroDetails2 = document.getElementById('chequeDinheiroDetails2');
    const rzzz = document.getElementById('rzzz');

    metodoPagamento.addEventListener('change', function() {
        // Esconder todos os detalhes de pagamento
        cartaoDetails.classList.add('hidden');
        cartaoDetails1.classList.add('hidden');
        cartaoDetails2.classList.add('hidden');
        rzz.classList.add('hidden');
        chequeDinheiroDetails.classList.add('hidden');
        chequeDinheiroDetails1.classList.add('hidden');
        chequeDinheiroDetails2.classList.add('hidden');
        rzzz.classList.add('hidden');

        // Mostrar os detalhes relevantes com base no método de pagamento selecionado
        if (metodoPagamento.value === 'cartao') {
            cartaoDetails.classList.remove('hidden');
            console.log('cartaoDetails visible');
            cartaoDetails1.classList.remove('hidden');
            console.log('cartaoDetails1 visible');
            cartaoDetails2.classList.remove('hidden');
            console.log('cartaoDetails2 visible');
            rzz.classList.remove('hidden');
            console.log('rzz visible');
        } else if (metodoPagamento.value === 'cheque') {
            chequeDinheiroDetails.classList.remove('hidden');
            console.log('chequeDinheiroDetails visible');
            chequeDinheiroDetails1.classList.remove('hidden');
            console.log('chequeDinheiroDetails1 visible');
            chequeDinheiroDetails2.classList.remove('hidden');
            console.log('chequeDinheiroDetails2 visible');
            rzzz.classList.remove('hidden');
            console.log('rzzz visible');
        } else if (metodoPagamento.value === 'dinheiro') {
            chequeDinheiroDetails.classList.remove('hidden');
            console.log('chequeDinheiroDetails visible');
            chequeDinheiroDetails1.classList.remove('hidden');
            console.log('chequeDinheiroDetails1 visible');
            chequeDinheiroDetails2.classList.remove('hidden');
            console.log('chequeDinheiroDetails2 visible');
            rzzz.classList.remove('hidden');
            console.log('rzzz visible');
        }
    }); 
    metodoPagamento.dispatchEvent(new Event('change'));

