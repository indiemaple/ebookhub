

@if (count($books))

<ul class="list-group row topic-list">
    @foreach ($books as $book)

    <li class="list-group-item ">

        <a class="reply_count_area hidden-xs pull-right" href="{{ $book->link() }}">
            <div class="count_set">


                <span class="count_seperator"></span>

                <abbr title="{{ $book->updated_at }}" class="timeago">{{ $book->updated_at }}</abbr>
            </div>
        </a>

        <div class="avatar pull-left">

        </div>


        <div class="infos">

            <div class="media-heading">



                <a href="{{ $book->link() }}" title="{{{ $book->title }}}">
                    {{{ $book->title }}}
                </a>

            </div>

        </div>

    </li>
    @endforeach
</ul>

@else
<div class="empty-block">{{ lang('Dont have any data Yet') }}~~</div>
@endif
