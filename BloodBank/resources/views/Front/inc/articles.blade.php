@inject('records', "App\Post")
<!-- Articles Start -->
<section id="articles">
    <div class="container">
        <h2 style="display: inline-block;">Articles</h2>
        <div class="swiper-container">
            <div class="button-area" style="display: inline-block; margin-left: 850px;">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
                </button>
            </div>
            <div class="swiper-wrapper">
                @foreach($records->paginate(4) as $record)
                    <div class="swiper-slide">
                        <div class="card">
                            <div class="card-img-top" style="position: relative;">
                                <img src="{{asset('/Front/'. $record->image)}}" alt="Card image">
                                    <i id="{{$record->id}}" onclick="favoriteToggle(this)" onload="favorites('{{$record}}')"
                                       class="fas fa-heart icon-large
                                           @auth('client-web')
                                                @forelse(auth()->guard('client-web')->user()->posts->where('id', $record->id) as $favorite)
                                                   @if($favorite->id == $record->id)
                                                       like
                                                        @endif
                                                   @empty
                                                       dislike
                                                @endforelse
                                                   @else
                                                   dislike
                                           @endauth
                                    "></i>
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">{{$record->title}}</h4>
                                <p class="card-text"> {{$record->content}} </p>
                                <div class="btn-cont">
                                    <button class="card-btn" onclick= "window.location.href = '{{url('/article', $record->id)}}';">Details</button>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforeach
            </div><br>
                <div class="float-left">
                    {{$records->paginate(4)->links()}}
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Articles End -->
@push('scripts')
    <script>
        function favoriteToggle(attr) {
            @if (auth()->guard('client-web')->user())
              var api_token = "{{auth()->guard('client-web')->user()->api_token}}";

            $.ajax({
                url: '{{url("/api/v1/toggle")}}',
                type: 'post',
                data: {_token: "{{csrf_token()}}", post_id:attr.id, api_token: api_token},
                success: function (data) {
                    if (data.status === 1){
                        if($(attr).attr('class').includes('dislike')){
                            $(attr).removeClass('dislike').addClass('like');
                        }else{
                            $(attr).removeClass('like').addClass('dislike');
                        }
                    }else{
                        alert('Please LogIn First');
                    }
                }
            });
            @else
            alert('Please LogIn First');
            @endif
        }
    </script>
@endpush
