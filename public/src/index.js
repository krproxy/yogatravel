import 'babel-polyfill';

import React from 'react';
import { render } from 'react-dom';

import { Provider } from 'react-redux';

import App from './containers/App';
import configureStore from './store/configureStore';

import axios from 'axios';

const store = configureStore();

axios.get('/getNews')
  .then(function (response) {
    store.dispatch({type: 'SET_POINTS', payload: response.data});
  })
  .catch(function (error) {
    console.log(error);
  });

render(
	<Provider store={store}>
		<App />
    </Provider>,
  document.getElementById('root')
);