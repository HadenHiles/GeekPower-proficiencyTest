$(function() {
    $('#elves').DataTable();
    
    $('.delete-elf').click(function(e) {
        e.preventDefault();
        var id = $(this).data('id');
        if(confirm("Are you sure you want to remove this poor little elf from the list?")) {
            $.ajax({
                url:"/GeekPower-proficiencyTest/pages/crud.php",
                data: { delete: true, id: id },
                method:"POST"
            }).done(function(result) {
                location.reload();
            }).fail(function() {
                alert("An error occurred");
            });
        }
    });
});