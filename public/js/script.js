// favorite.js

$(document).ready(function() {
    $('#favoriteBtn').on('click', function(event) {
        event.preventDefault(); // Ngăn chặn hành động mặc định của nút
        
        var id_book = $('#id_book').val();
        
        // Gửi yêu cầu AJAX để thêm hoặc xóa yêu thích
        $.ajax({
            type: "POST",
            url: "toggle_favorite.php",
            data: { id_book: id_book },
            success: function(response) {
                if (response === 'not_login') {
                    // Hiển thị thông báo nếu người dùng chưa đăng nhập
                    alert("Vui lòng đăng nhập để thêm vào yêu thích.");
                    
                } else {
                    if (response === 'added') {
                        $("#favoriteIcon").removeClass("fa-regular").addClass("fa-solid");
                    } else if (response === 'removed') {
                        $("#favoriteIcon").removeClass("fa-solid").addClass("fa-regular");
                    }
                }
            }
            
        });
    });
});


//Xóa thể loại
$(document).ready(function() {
  $('.delete-genre-btn').on('click', function(e) {
    e.preventDefault();

    const form = $(this).closest('form');
    const genre = $(this).closest('tr').find('td').eq(1);

    if (genre.length > 0) {
      $('.modal-body').html(
        `Bạn có muốn xóa "${genre.text()}" không? Nếu xóa thì tất cả sách thuộc thể loại này cũng sẽ bị xóa.`
      );
    }

    $('#delete-confirm').modal('show'); // Hiển thị modal

    $('#delete-confirm').on('click', '#delete', function() {
      form.submit();
    });

  });
});
