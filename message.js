function showMenu(element) {
  // Создаем меню
  const menu = document.createElement('div');
  menu.classList.add('message-menu');

  // Добавляем пункты меню
  const menuItem1 = document.createElement('button');
  menuItem1.textContent = 'Ответить';
  menuItem1.onclick = function() {
    // Код для ответа на сообщение
  };
  menu.appendChild(menuItem1);

  const menuItem2 = document.createElement('button');
  menuItem2.textContent = 'Удалить';
  menuItem2.onclick = function() {
    // Код для удаления сообщения
  };
  menu.appendChild(menuItem2);

  // Показываем меню
  menu.style.position = 'absolute';
  menu.style.top = element.offsetTop + 'px';
  menu.style.left = element.offsetLeft + 'px';
  document.body.appendChild(menu);

  // Удаляем меню при клике вне меню
  document.addEventListener('click', function(event) {
    if (!menu.contains(event.target)) {
      menu.remove();
    }
  });

  // Предотвращаем показ контекстного меню браузера
  event.preventDefault();
}