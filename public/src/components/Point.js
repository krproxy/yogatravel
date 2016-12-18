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
				<a className={point_class} href={ '/service/' + point.id }>{point.address}</a>				
			</div>
			<div className='col-xs-12'>
				<div className='media'>
				<div className='media-left'>
					<img className='img37' src={point_img_src} />							
				</div>
				<div className='media-body media-middle'>
					<span className={point_class}>{point.created_at.split(' ').shift()}</span>
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
        </a>

    </div>
    <hr/>








				
			</div>
		</div>;
	}
}