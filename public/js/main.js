//format input number field
const idInput = document.querySelectorAll('input#kode')
idInput.forEach(item => {
    item.addEventListener('keyup', event => {
        let string = event.target.value.replace(/[a-z]/g, '')
        let p = string.replace(/\s/g, '.')
        item.value = p.toLocaleString()
    }, false)
})
// const temaSelect = () =>{
const inputTema = document.getElementById('selectInputTema')
const inputSubTema = document.getElementById('selectInputSubTema')
const inputKd = document.getElementById('kd_select_input')
fetch('/rppm-json-file')
    .then(response => {
        return response.json()
    })
    .then(allData => {
        inputTema.addEventListener('change', (event) => {
            const filter = allData.data.filter(data => {
                return data.id == event.target.value
            })
            if (filter.length >0){
            filter.map(data => {
                inputSubTema.innerHTML = data.sub_tema.map(subTema => {
                    return `<option value="${subTema.id}">${subTema.nama_sub_tema}</option>`
                }).join('')
                inputKd.innerHTML = data.kd.map(dataKd => {
                    return `<option value="${dataKd.id}">${dataKd.nama_kd}</option>`
                }).join('')
            }).join('')
            }
            else {
                inputSubTema.innerHTML = `<option>tidak ada sub tema</option>`
                inputKd.innerHTML = `<option>tidak ada kompetensi dasar</option>`
            }
        })
    })
// }
