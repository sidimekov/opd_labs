const pvcButtons = document.querySelectorAll('.pvc-button');

pvcButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
        const pvcLists = document.querySelectorAll('.pvc-list');
        pvcLists.forEach((list) => {
            list.style.display = 'none';
        });
        pvcLists[index].style.display = 'block';
    });
});