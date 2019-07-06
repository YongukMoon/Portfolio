@include('comments.partial.create')

@section('style')
    @parent
    <style>
        .media-body > .create,
        .media-body > .edit,
        .media-body > .comment
        {
            display: none;
        }
    </style>
@endsection

<div class="comment__list">
    @forelse ($comments as $comment)
        @include('comments.partial.comment', [
            'parentId'=>$comment->id
        ])
    @empty
        
    @endforelse
</div>

@section('script')
    @parent
    <script>
        $('.comment__create').on('click', function(e){
            $(this).parent('.comment__action').siblings('.create').toggle();
        });

        $('.comment__edit').on('click', function(e){
            $(this).parent('.comment__action').siblings('.edit').toggle();
        });

        $('.comment__view').on('click', function(e){
            $(this).parent('.comment__action').siblings('.comment').toggle();
        });

        $('.comment__delete').on('click', function(e){
            if(confirm('Comment delete ?')){
                var self=$(this);
                var commentId=self.closest('.media').data('id');

                $.ajax({
                    type: 'DELETE',
                    url: '/comments/'+commentId
                }).then(function(){
                    self.closest('.media').remove();
                })
            }
        });
    </script>
@endsection