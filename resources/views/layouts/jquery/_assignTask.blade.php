<script>
    console.log("OKK im working")
    function showDetailsOfSpecificEmployee(){
        var specificEmployee = $('#selectEmployee').val()
        if(specificEmployee !=null){
            $('#employeeDetails').val("User Information")
        }
    }
    showDetailsOfSpecificEmployee();

</script>