


@foreach( THEM_ADMIN::render_menus() as $key_menus=> $m)
<li class="nav-item" {{(isset($m['submenu']))?'data-item="menus-side-left-'.$key_menus.'"':''}}>
	<a class="nav-item-hold" href="{{(isset($m['submenu']))?'javascript:void(0)':$m['url']}}">
		<i class="{{isset($m['icon'])?$m['icon']:'fa fa-circle'}}"></i>
		<span class="nav-text">{{$m['text']}}</span>
	</a>
	{{(isset($m['submenu']))?'<div class="triangle"></div>':''}}
    
</li>
@endforeach