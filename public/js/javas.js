function toggleContent() {
    var arrow = document.getElementById('arrow');
    var content = document.getElementById('content');

    // Змінюємо стан відображення контенту
    if (content.style.display === 'none') {
        content.style.display = 'grid';
    } else {
        content.style.display = 'none';
    }

    // Додаємо або видаляємо клас для анімації повороту
    arrow.classList.toggle('rotate');
}

function toggleContent2() {
    var arrow = document.getElementById('arrow2');
    var content = document.getElementById('content2');

    // Змінюємо стан відображення контенту
    if (content.style.display === 'none') {
        content.style.display = 'grid';
    } else {
        content.style.display = 'none';
    }

    // Додаємо або видаляємо клас для анімації повороту
    arrow.classList.toggle('rotate');
}

function toggleContent3() {
    var arrow = document.getElementById('arrow3');
    var content = document.getElementById('content3');

    // Змінюємо стан відображення контенту
    if (content.style.display === 'none') {
        content.style.display = 'grid';
    } else {
        content.style.display = 'none';
    }

    // Додаємо або видаляємо клас для анімації повороту
    arrow.classList.toggle('rotate');
}

