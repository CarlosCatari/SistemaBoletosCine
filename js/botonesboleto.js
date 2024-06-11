document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('#contenedor1');
    const contadorboletoElement = document.getElementById('contadorboleto');
    let contadorboleto = 0;

    const updatecontadorboleto = () => {
        contadorboleto = 0;
        counters.forEach(counterContainer => {
            const counterValue = parseInt(counterContainer.querySelector('.label1').textContent);
            contadorboleto += counterValue;
        });
        contadorboletoElement.textContent = contadorboleto;
    };

    counters.forEach(counterContainer => {
        let counter = 0;
        const counterValue = counterContainer.querySelector('.label1');
        const incrementButton = counterContainer.querySelector('.increment1');
        const decrementButton = counterContainer.querySelector('.decrement1');

        incrementButton.addEventListener('click', () => {
            counter++;
            counterValue.textContent = counter;
            updatecontadorboleto();
        });

        decrementButton.addEventListener('click', () => {
            if (counter > 0) {
                counter--;
                counterValue.textContent = counter;
                updatecontadorboleto();
            }
        });
    });
});