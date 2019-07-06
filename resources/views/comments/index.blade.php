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

@if (isset($currentUser))
    @include('comments.partial.create')
@else
    <p><a href="{{ route('sessions.create') }}">Sign-in</a> is required to create comments and up-downs.</p>
@endif

<hr>

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

        $('.comment__vote').on('click', function(e){
            var self=$(this);
            var commentId=self.closest('.comment').data('id');

            $.ajax({
                type: 'POST',
                url: '/comments/'+commentId+'/votes',
                data: {
                    vote: self.data('vote')
                }
            }).then(function(data){
                self.find('span').html(data.value).fadeIn();
                self.attr('disabled', 'disabled');
                self.siblings('.comment__vote').attr('disabled', 'disabled');
            });
        });
    </script>
@endsection