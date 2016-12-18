import React, { PropTypes, Component } from 'react';
import Point from '../components/Point';
import {ALL, CHECK_INN, TEA_SERVICE, COUCH_SERVICE, WALK_SERVICE} from '../constants/Page';

export default class Page extends Component {
	onYearBtnClick(e) {
		this.props.setShowMode(e.target.innerText);
	}
	render() {
		const { points, showMode } = this.props;
		return <div className='row'>
			<div className='col-xs-3 col-sm-2 col-md-1'>
				<div data-spy='affix' data-offset-top='60'>
					<button 
						type='button' 
						className={showMode.indexOf(ALL) != -1 ? 'btn btn-news btn-allNews active' : 'btn btn-news btn-allNews'}
						onClick={::this.onYearBtnClick}>
						<span className='transparent'>{ALL}</span>
					</button><br/>
					<button
						type='button' 
						className={showMode.indexOf(CHECK_INN) != -1 ? 'btn btn-news btn-checkInn active' : 'btn btn-news btn-checkInn'} 
						onClick={::this.onYearBtnClick}>
						<span className='transparent'>{CHECK_INN}</span>
					</button><br/>
					<button 
						type='button' 
						className={showMode.indexOf(TEA_SERVICE) != -1 ? 'btn btn-news btn-tea active' : 'btn btn-news btn-tea'}
						onClick={::this.onYearBtnClick}>
						<span className='transparent'>{TEA_SERVICE}</span>
					</button><br/>
					<button
						type='button'
						className={showMode.indexOf(COUCH_SERVICE) != -1 ? 'btn btn-news btn-couch active' : 'btn btn-news btn-couch'}
						onClick={::this.onYearBtnClick}>
						<span className='transparent'>{COUCH_SERVICE}</span>
					</button><br/>
					<button
						type='button'
						className={showMode.indexOf(WALK_SERVICE) != -1 ? 'btn btn-news btn-walk active' : 'btn btn-news btn-walk'}
						onClick={::this.onYearBtnClick}>
						<span className='transparent'>{WALK_SERVICE}</span>
					</button>
				</div>
			</div>
			<div className ='col-xs-9 col-sm-10 col-md-11'>
				{points.length == 0 ? 
					<div className='text-center'>
						<h3>Загружаем события</h3>
						{/* <div className='loader'></div>*/}
					</div> :
					points.map(point => {
						return showMode.indexOf(ALL) != -1 ? <Point key={point.id} point={point} /> :
							showMode.indexOf(point.type) != -1 ? <Point key={point.id} point={point} /> :
								'';
					})}
			</div>
		</div>;
	}
}

Page.propTypes = {
	points: PropTypes.array.isRequired,
	setShowMode: PropTypes.func.isRequired
};