import { ALL, SET_SHOW_MODE, SET_POINTS } from '../constants/Page';

const initialState = {
  showMode: [ALL],
  points: []
};

export default function page(state = initialState, action) {
	switch(action.type) {
		case SET_SHOW_MODE:
			// сохраняем текущий масив режимов отображения в масив для обработки
			var resultErray = state.showMode;
			// берем индекс пришедшего режима в массиве (-1 если отсутствует)
			var	index = resultErray.indexOf(action.payload);
			// если нам пришел  ALL
			if(action.payload == ALL) {
				// если нет - обнуляем масив и добавляем его, если да просто убираем
				if(index == -1)
					resultErray = [ALL];
				else
					resultErray.splice(index, 1);
			}
			// если нам пришел не ALL
			else {
				// проверяем есть ли єлемент в масиве, если да - убираем, если нет - добавляем
				// также проверяем есть ли ALL если да - убираем
				var indexAll = resultErray.indexOf(ALL);
				if(indexAll != -1) resultErray.splice(indexAll, 1);

				index == -1 ? resultErray.push(action.payload) : resultErray.splice(index, 1);
			}
			return  { ...state, showMode: resultErray };
		case SET_POINTS:
			return { ...state, points: action.payload};
		default:
			return state;
	}
}