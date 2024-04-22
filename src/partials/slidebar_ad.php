<div>
    <ul class="list-group list-group-flush">
        <li class="list-group-item p-2 <?php echo $type === 'read' ? 'selected-ad' : ''; ?>"><a href="?type=read"><i
                    class="fa-solid fa-heart"></i> Sách đã đọc</a></li>
        <li class="list-group-item p-2 <?php echo $type === 'favourite' ? 'selected-ad' : ''; ?>"><a
                href="?type=favourite"><i class="fa-solid fa-book-open-reader"></i> Sách yêu
                thích</a></li>

    </ul>
</div>