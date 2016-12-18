import React, { Component } from 'react';
import {CHECK_INN, TEA_SERVICE, COUCH_SERVICE, WALK_SERVICE} from '../constants/Page';


export default class Page extends Component {
	render() {
		let {point} = this.props;
		let point_class, point_img_src;

		switch(point.type){
			case CHECK_INN:
				point_class = 'corporateBlue';
				point_img_src = '/img/SVG/map_check-in_47x60.svg';
				break;
			case TEA_SERVICE:
				point_class = 'color-tea';
				point_img_src = '/img/SVG/button_tea_135x135.svg';
				break;
			case COUCH_SERVICE:
				point_class = 'color-sleep';
				point_img_src = '/img/SVG/button_couch_203_135.svg';
				break;
			case WALK_SERVICE:
				point_class = 'color-walk';
				point_img_src = '/img/SVG/button_walk_172x135 (1).svg';
				break;
		}

		return <div className ='row'>
			<div className='col-xs-12'>
				<div className='media'>
					<div className='media-left'>
						<h3><a className={point_class} href={ '/service/' + point.id } >
								<img className='img37' src={point_img_src} />
							</a></h3>
					</div>
					<div className='media-body media-middle'>
						<h3><a className={point_class} href={ '/service/' + point.id }>
							{point.address}</a></h3>
					</div>
				</div>
			</div>
			<div className='col-xs-12'>
				{point.images.map(image => <img
					src={image.filename + '/150/100/chunk'}
					alt={image.alt}
					title={image.title}
					className='thumbnail pull-left'/>
				)}
			</div>
			<div className='col-xs-12'>
				{point.description}
			</div>
			<div className='col-xs-12'>
    <div className='media'>
		<a href={ '/profile/' + point.user_id }>
			<div className='media-left'>
				<img src={point.authorAvatar} className='img37 circle .mt--5 media-object' />
			</div>
			<div className='media-body'>
				<span className={'f600-16 pm-0 ' + point_class}>{point.authorName}</span>
			</div>
			<div className='media-body media-right'>
							<span className={'f600-16 pm-0 ' + point_class}>{point.created_at}</span>

			</div>
        </a>

    </div>
    <hr/>








				
			</div>
		</div>;
	}
}


// @foreach($yogaPoints as $point)
//     @if($point->type=='teaService')
//         <?php $point_class = "color-tea";$point_img_src = "/img/SVG/button_tea_135x135.svg"; ?>
//     @elseif($point->type=='checkInn')
//         <?php $point_class = "corporateBlue";$point_img_src = "/img/SVG/map_check-in_47x60.svg"; ?>
//     @elseif($point->type=='couchService')
//         <?php $point_class = "color-sleep";$point_img_src = "/img/SVG/button_couch_203_135.svg"; ?>
//     @elseif($point->type=='walkServices')
//         <?php $point_class = "color-walk";$point_img_src = "/img/SVG/button_walk_172x135 (1).svg"; ?>
//     @endif

//     <div class="media">
//         <div class="media-left">
//             <h3><a class="{{$point_class}}" href="/service/{{$point->id}}">
//                     <img class="img37" src="{{$point_img_src}}"
//                          alt="">
//                 </a>
//             </h3>
//         </div>
//         <div class="media-body media-middle">
//             <h3><a class="{{$point_class}}" href="/service/{{$point->id}}">{{$point->address}}</a>
//             </h3>
//         </div>
//     </div>
//     {{$point->description}}
//     <div class="media">
//         <div class="media-left">
//             <a href="{{URL::to('/profile/' . $point->user_id)}}">
//                 <img src="{{isset(\app\User::findOrNew($point->user_id)->avatar)?\app\User::findOrNew($point->user_id)->avatar:asset('img/SVG/profile_12x13.svg')}}"
//                      alt="" class="img37 circle .mt--5 media-object">
//             </a>
//         </div>
//         <div class="media-body">
//             <h4 class="media-heading">Автор:</h4>
//             <a href="{{URL::to('/profile/' . $point->user_id)}}">
//                 <span class="f600-16 {{$point_class}} pm-0">{{\app\User::findOrNew($point->user_id)->name}}</span>
//             </a>
//         </div>
//     </div>
//     <hr>
// @endforeach