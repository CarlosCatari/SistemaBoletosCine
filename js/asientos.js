
document.addEventListener('DOMContentLoaded', (event) => {
    const buttons = document.querySelectorAll('.seat-button');
    
    // Cargar el estado desde localStorage
    buttons.forEach(button => {
        const label = button.id;
        if (localStorage.getItem(label) === 'selected') {
            button.classList.remove('btn-outline-primary');
            button.classList.add('btn-primary');
        }
    });

    // Agregar detectores de eventos click para cambiar el estado
    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const label = button.id;
            if (button.classList.contains('btn-outline-primary')) {
                button.classList.remove('btn-outline-primary');
                button.classList.add('btn-primary');
                localStorage.setItem(label, 'selected');
            } else {
                button.classList.remove('btn-primary');
                button.classList.add('btn-outline-primary');
                localStorage.removeItem(label);
            }
        });
    });
});