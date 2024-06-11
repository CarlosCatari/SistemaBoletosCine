document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('#contenedor2');
    const contadordulceriaElement = document.getElementById('contadordulceria');
    let contadordulceria = 0;

    const updatecontadordulceria = () => {
        contadordulceria = 0;
        counters.forEach(counterContainer => {
            const counterValue = parseInt(counterContainer.querySelector('.label2').textContent);
            contadordulceria += counterValue;
        });
        contadordulceriaElement.textContent = contadordulceria;
    };

    counters.forEach(counterContainer => {
        let counter = 0;
        const counterValue = counterContainer.querySelector('.label2');
        const incrementButton = counterContainer.querySelector('.increment2');
        const decrementButton = counterContainer.querySelector('.decrement2');

        incrementButton.addEventListener('click', () => {
            counter++;
            counterValue.textContent = counter;
            updatecontadordulceria();
        });

        decrementButton.addEventListener('click', () => {
            if (counter > 0) {
                counter--;
                counterValue.textContent = counter;
                updatecontadordulceria();
            }
        });
    });
});