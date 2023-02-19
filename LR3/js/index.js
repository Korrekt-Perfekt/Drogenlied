
const createButton = document.getElementById('create');
const addButton = document.getElementById('add');
const removeButton = document.getElementById('remove');
const numberInput = document.getElementById('input');
let table;

const tableContent = ["Случайный текст №1", "Случайный текст №2",
  "Случайный текст №3", "Случайный текст №4", "Случайный текст №5"];

console.log('createButton', createButton)

createButton.addEventListener('click', () => {
    table = document.getElementById('table');

    if (table) {
        alert('Таблица уже существует')
    } else { document.getElementById('container').insertAdjacentHTML("beforeend", 
    `<table id='table'>
        <caption>Ваша таблица</caption>
            <thead>
            <tr>
                <th>Номер строки</th>
                <th>Содержание строки</th>
            </tr>
            </thead>
            <tbody>
            <tr id="tr-1">
                <th>1</th>
                <th>Привет! Я первая строка</th>
            </tr>
            </tbody>
    </table>`)

    table = document.getElementById('table');

    addButton.disabled = false;
    removeButton.disabled = false;
    numberInput.disabled = false;
    } 
})

addButton.addEventListener('click', () => {
   
    table.querySelector('tbody').insertAdjacentHTML('beforeend', `
    <tr id="tr-${table.querySelectorAll('tr').length}">
        <th>${table.querySelectorAll('tr').length}</th>
        <th>${tableContent[Math.floor(Math.random() * tableContent.length)]}</th>
    </tr>
    `)
})

removeButton.addEventListener('click', () => {
    if (!numberInput.value){
        alert('Вы не ввели номер строки');
    } else if (!Number.isInteger(+numberInput.value)) {
        alert('Номер строки должен быть целым числом');
    } else {
        const numbers = [];
        table.querySelectorAll('tr').forEach((tr) => {
            if (tr.id){
                numbers.push( tr.id.split('-')[1] )
            }
        })

        if (numbers.includes(numberInput.value)){
            document.getElementById(`tr-${numberInput.value}`).remove();
            numberInput.value = ''

            table.querySelectorAll('tr').forEach((tr, index) => {
                if (index === 0) return;
                tr.id = `tr-${index}`;
                tr.querySelector('th').innerText = index;
              });

        } else {
            alert(`Строки с номером ${number.Input.value} нет в таблице`);
        }
    }
})

