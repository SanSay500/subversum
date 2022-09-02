import s from './activeHex.module.css';

export const ActiveHex = ({
	textClick,
	textMore,
	subtitle,
	text,
	positionTextClick,
	positionTextMore,
	positionText,
	imgSrc,
	positionImg,
	learnMoreState,
	clickTextClick,
	clickTextMore,
}) => {
	return (
		<>
			{!learnMoreState && (
				<p
					className={`${s.click} ${positionTextClick}`}
					onClick={() => clickTextClick()}>
					{textClick}
				</p>
			)}
			{!learnMoreState ? (
				<></>
			) : learnMoreState === 'dark' ? (
				<p className={`${s.click} ${positionTextMore}`}>{subtitle}</p>
			) : (
				<p
					className={`${s.click} ${positionTextMore}`}
					onClick={() => clickTextMore()}>
					{textMore}
				</p>
			)}
			{learnMoreState === 'dark' ? (
				<p className={`${s.darkText} ${positionText}`}>{text}</p>
			) : (
				<></>
			)}

			{learnMoreState && (
				<div className={`${s.imgContainer} ${positionImg}`}>
					<img className={`${s.img}`} src={`${imgSrc}`} />
				</div>
			)}
		</>
	);
};
