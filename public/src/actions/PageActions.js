import { SET_SHOW_MODE } from '../constants/Page';


export function setShowMode(showMode) {
  return {
    type: SET_SHOW_MODE,
    payload: showMode
  };
}