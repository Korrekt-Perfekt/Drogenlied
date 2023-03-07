const toCartButtons = document.querySelectorAll('.product__button');
toCartButtons.forEach(button => {
    button.addEventListener('click', () => {
        button.classList.toggle('clicked')
        button.textContent === 'В корзину' ? button.textContent = 'Добавлен' : button.textContent = 'В корзину';
    })
})
