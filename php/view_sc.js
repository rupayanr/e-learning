console.log("view_sc script is loaded");

// To prevet form from submitting if any value is not selected 
const form = document.getElementById('scheduled_courses');

form.addEventListener('submit',(e)=>{
    if(!edit_val()){
        alert('Please select a value to edit')
        e.preventDefault()
    }

})


// To disable table rows that are in progress or completed// 
$("tr.progress input, tr.completed input").prop('disabled',true);

// To fetch the selected row values //
function fetchvals(){

    var options = $(".options:checked").val();
    str = options.toString();
    //console.log(str);
    return str
}

// Select only one checkbox from a single group //

$('input[type="checkbox"]').on('change', function edit_val(){
    $('input[type="checkbox"]').not(this).prop('checked',false);
    var val = fetchvals();
    console.log(val);
    return val;
})



//var val_arr = $("#$sel_id:checked").val() || [];

/* for ( let val of val_arr){
    console.log(val);
}
 */


