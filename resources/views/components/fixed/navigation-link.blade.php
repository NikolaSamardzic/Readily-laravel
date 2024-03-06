<li><a href="{{ $link['href'] }}"  @if(request()->root() . ($link['href'] == '/' ? '' : $link['href']) ==url()->current()) id='active-link' @endif >{{$link['name']}}</a></li>

