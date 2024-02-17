document.querySelectorAll('.nav-link').forEach(link => {
  link.addEventListener('click', function(e) {
    e.preventDefault(); // Предотвращаем переход по ссылке по умолчанию

    const href = this.getAttribute('data-href');
    const container = document.querySelector('.container');

    container.style.transition = 'transform 0.5s ease'; // Добавляем анимацию сдвига

    container.style.transform = 'translateX(100%)'; // Сдвигаем контейнер вправо

    setTimeout(() => {
      window.location.href = href; // После сдвига осуществляем переход по указанной ссылке
    }, 300); // Ждем 0.5 секунды (время анимации) перед переходом
  });
});

