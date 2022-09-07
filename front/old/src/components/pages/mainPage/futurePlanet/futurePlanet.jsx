import { useState } from 'react';
import { ActiveHex } from '../../../common/activeHex/activeHex';
import { HexTwoRows } from '../../../common/hexTwoRows/hexTwoRows';
import s from './futurePlanet.module.css';
import home from '../../../../img/mainPage/home.png';

export const FuturePlanet = () => {
	const [whiteSeven, setWhiteSeven] = useState('white');
	const [sevenLearnMore, setSevenLearnMore] = useState(false);
	const [sevenLearnMoreInfo, setSevenLearnMoreInfo] = useState(false);

	const clickSevenHex = () => {
		setWhiteSeven(true);
		setSevenLearnMore('white');
	};
	const clickSevenLearnMore = () => {
		setSevenLearnMore('dark');
		setSevenLearnMoreInfo('dark');
	};

	const [whiteThree, setWhiteThree] = useState('white');
	const [threeLearnMore, setThreeLearnMore] = useState(false);
	const [threeLearnMoreInfo, setThreeLearnMoreInfo] = useState(false);

	const clickThreeHex = () => {
		setWhiteThree(true);
		setThreeLearnMore('white');
	};
	const clickThreeLearnMore = () => {
		setThreeLearnMore('dark');
		setThreeLearnMoreInfo('dark');
	};

	const hexGrid = {
		firstRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: false },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		secondRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
		],
		thirdRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: false },
			{
				q: 2,
				s: 1,
				invisible: whiteSeven,
				click: () => clickSevenHex(),
			},
			{
				q: 3,
				s: 1,
				invisible: whiteSeven,
				click: () => clickSevenHex(),
			},
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		fourthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: false },
			{
				q: 1,
				s: 1,
				invisible: whiteSeven,
				click: () => clickSevenHex(),
			},
			{
				q: 2,
				s: 1,
				invisible: whiteSeven,
				click: () => clickSevenHex(),
			},
			{
				q: 3,
				s: 1,
				invisible: whiteSeven,
				click: () => clickSevenHex(),
			},
			{ q: 4, s: 1, invisible: false },
		],
		fifthRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: false },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{
				q: 1,
				s: 1,
				invisible: sevenLearnMore,
				click: sevenLearnMore === 'white' ? () => clickSevenLearnMore() : false,
			},
			{
				q: 2,
				s: 1,
				invisible: whiteSeven,
				click: () => clickSevenHex(),
			},
			{
				q: 3,
				s: 1,
				invisible: whiteSeven,
				click: () => clickSevenHex(),
			},
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		sixthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: false },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: sevenLearnMoreInfo },
			{ q: 1, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 2, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
		],
		seventhRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: whiteThree, click: () => clickThreeHex() },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		eighthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: whiteThree, click: () => clickThreeHex() },
			{ q: -3, s: 1, invisible: whiteThree, click: () => clickThreeHex() },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: true },
			{ q: 3, s: 1, invisible: true },
			{ q: 4, s: 1, invisible: false },
		],
		ninthRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: false },
			{
				q: -2,
				s: 1,
				invisible: threeLearnMore,
				click: threeLearnMore === 'white' ? () => clickThreeLearnMore() : false,
			},
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: true },
			{ q: 3, s: 1, invisible: true },
			{ q: 4, s: 1, invisible: true },
			{ q: 5, s: 1, invisible: false },
		],
		tenthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: threeLearnMoreInfo },
			{ q: -3, s: 1, invisible: threeLearnMoreInfo },
			{ q: -2, s: 1, invisible: threeLearnMoreInfo },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
		],
	};

	return (
		<section>
			<div className={`positionContainer`}>
				<div className={s.info}>
					<h3 className={`subtitle`}>Future of the planet on your way</h3>

					<p className={`text`}>
						Success in business, as well as in the game, depends on the activity
						and decisions that you make. Don't believe it? Get ready for a new
						gaming experience! Send your consciousness further than to the Moon.
					</p>
				</div>

				<ActiveHex
					textClick={'click to see more!'}
					textMore={'To learn more!'}
					subtitle={'Gold refinery'}
					text={`These buildings are the housing for your workers. It is crucial to have ones because good living conditions allow your workers to fully concentrate on their work. Moreover, having workers' housing increases their loyalty to you.`}
					positionTextClick={s.sevenPositionTextClick}
					positionTextMore={s.sevenPositionTextMore}
					positionText={s.sevenPositionText}
					imgSrc={home}
					positionImg={s.sevenPositionImg}
					learnMoreState={sevenLearnMore}
					clickTextClick={clickSevenHex}
					clickTextMore={clickSevenLearnMore}
				/>
			</div>

			<HexTwoRows rowTop={hexGrid.firstRow} rowBtm={hexGrid.secondRow} />
			<HexTwoRows rowTop={hexGrid.thirdRow} rowBtm={hexGrid.fourthRow} />
			<HexTwoRows rowTop={hexGrid.fifthRow} rowBtm={hexGrid.sixthRow} />
			<HexTwoRows rowTop={hexGrid.seventhRow} rowBtm={hexGrid.eighthRow} />
			<HexTwoRows rowTop={hexGrid.ninthRow} rowBtm={hexGrid.tenthRow} />

			<div className={`positionContainer`}>
				<p className={`text ${s.btmText}`}>
					Subversum turns everything you think about the process of developing
					valuable resources, manufacturing and making a profit 180 degrees.
					Develop a green economic strategy. This world is anti-world, and the
					reverse is true: the planet thrives when everyone wins.
				</p>

				<ActiveHex
					textClick={'click'}
					textMore={'To learn more!'}
					subtitle={'Works'}
					text={
						'Gold bars must be processed back into ore because it is the only way it can be returned to the bowels, thereby improving the environment. We need a refinery only for that purpose.'
					}
					positionTextClick={s.threePositionTextClick}
					positionTextMore={s.threePositionTextMore}
					positionText={s.threePositionText}
					imgSrc={home}
					positionImg={s.threePositionImg}
					learnMoreState={threeLearnMore}
					clickTextClick={clickThreeHex}
					clickTextMore={clickThreeLearnMore}
				/>
			</div>
		</section>
	);
};
