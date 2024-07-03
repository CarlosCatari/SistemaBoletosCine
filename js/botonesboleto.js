document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('#contenedor1');
    const contadorboletoElement = document.getElementById('contadorboleto');
    const contadorbadge = document.getElementById('badge1');
    
    let contadorboleto = 0;

    const updatecontadorboleto = () => {
        contadorboleto = 0;
        counters.forEach(counterContainer => {
            const counterValue = parseInt(counterContainer.querySelector('.label1').textContent);
            contadorboleto += counterValue;
        });
        contadorboletoElement.textContent = contadorboleto;

        if (contadorboleto > 0) {
            contadorbadge.textContent = contadorboleto;
            document.getElementById('badge1').classList.remove('d-none');
        } else {
            document.getElementById('badge1').classList.add('d-none');
        }
    };

    counters.forEach(counterContainer => {
        let contador = 0;
        const counterValue = counterContainer.querySelector('.label1');
        const incrementButton = counterContainer.querySelector('.increment1');
        const decrementButton = counterContainer.querySelector('.decrement1');

        incrementButton.addEventListener('click', () => {
            contador++;
            counterValue.textContent = contador;
            updatecontadorboleto();
        });

        decrementButton.addEventListener('click', () => {
            if (contador > 0) {
                contador--;
                counterValue.textContent = contador;
                updatecontadorboleto();
            }
        });
    });
});