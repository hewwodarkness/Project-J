var enterEventCount = 0;
var leaveEventCount = 0;
const mouseTarget = document.getElementById('mouseTarget');
const unorderedList = document.getElementById('unorderedList');

mouseTarget.addEventListener('mouseenter', e => {
  mouseTarget.style.border = '5px dotted orange';
  enterEventCount++;
  addListItem('This is mouseenter event ' + enterEventCount + '.');
});

mouseTarget.addEventListener('mouseleave', e => {
  mouseTarget.style.border = '1px solid #333';
  leaveEventCount++;
  addListItem('This is mouseleave event ' + leaveEventCount + '.');
});

function addListItem(text) {
  // Создать новый текстовый узел, используя предоставленный текст
  var newTextNode = document.createTextNode(text);

  // Создать новый элемент li
  var newListItem = document.createElement("li");

  // Добавить текстовый узел к элементу li
  newListItem.appendChild(newTextNode);

  // Добавить вновь созданный элемент списка в список
  unorderedList.appendChild(newListItem);
}