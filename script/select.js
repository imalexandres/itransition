let selectAll = document.getElementById('selectAll');
let unselectAll = document.getElementById('unselectAll');
let checkboxes = document.querySelectorAll('.checkBox');


function select(isChecked) {

    for (let i = 0; i < checkboxes.length; i++) {
        checkboxes[i].checked = isChecked;
    }
}

selectAll.onclick = () => select(true)
unselectAll.onclick = () => select(false)