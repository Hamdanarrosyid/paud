// const formId = document.querySelector('#form-profile')
// const buttonProfile = document.querySelector('#button-profile')
// const btnArrow = document.querySelector('#btn-arrow')
// if (formId) {
//     buttonProfile.addEventListener('click', () => {
//         if (formId.classList.contains('hide')) {
//             btnArrow.classList.add('button-arrow-click')
//             formId.classList.remove('hide')
//         } else {
//             formId.classList.add('hide')
//             btnArrow.classList.remove('button-arrow-click')
//         }
//     })
// }

//format input number field
const inputId = document.querySelectorAll('input#kode')
inputId.forEach(item=>{
    item.addEventListener('keyup',event=>{
        let string = event.target.value.replace(/[a-z]/g, '')
        let p = string.replace(/\s/g, '.')
        item.value = p.toLocaleString()
    },false)
})

