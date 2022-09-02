import s from './whiteBtn.module.css';

export const WhiteBtn = ({ classes, text }) => {
	return <button className={`${s.btn} ${classes}`}>{text}</button>;
};
