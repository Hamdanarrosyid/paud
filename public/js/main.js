const formId = document.querySelector('#form-profile')
const buttonProfile = document.querySelector('#button-profile')
const btnArrow = document.querySelector('#btn-arrow')
if (formId){
    buttonProfile.addEventListener('click',()=>{
        if (formId.classList.contains('hide')){
            btnArrow.classList.add('button-arrow-click')
            formId.classList.remove('hide')
        }else {
            formId.classList.add('hide')
            btnArrow.classList.remove('button-arrow-click')
        }
    })
}
