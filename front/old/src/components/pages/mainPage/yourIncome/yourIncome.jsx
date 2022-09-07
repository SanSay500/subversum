import { HexTwoRows } from '../../../common/hexTwoRows/hexTwoRows';
import s from './yourIncome.module.css';
import { useState } from 'react';
import { ActiveHex } from '../../../common/activeHex/activeHex';
import home from '../../../../img/mainPage/home.png';

export const YourIncome = () => {
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

	const hexGrid = {
		firstRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: true },
			{ q: 3, s: 1, invisible: true },
			{ q: 4, s: 1, invisible: true },
			{ q: 5, s: 1, invisible: false },
		],
		secondRow: [
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
		],
		thirdRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 4, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 5, s: 1, invisible: false },
		],
		fourthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 3, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 4, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
		],
		fifthRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{
				q: 2,
				s: 1,
				invisible: sevenLearnMore,
				click: sevenLearnMore === 'white' ? () => clickSevenLearnMore() : false,
			},
			{ q: 3, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 4, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 5, s: 1, invisible: false },
		],
		sixthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: false },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 3, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 4, s: 1, invisible: sevenLearnMoreInfo },
		],
	};

	return (
		<section>
			<div className={`positionContainer`}>
				<h2 className={`title ${s.title}`}>
					Your income grows when you restore the planet's resources
				</h2>

				<div className={s.info}>
					<h3 className={`subtitle`}>Cryptocurrency + NFT</h3>

					<p className={`text`}>
						The laws of supersymmetry dictate a different logic of things than
						is accepted in our world. Subversum rewards activity and
						productivity, however. Successful entrepreneurs are paid by the
						state with a special cryptocurrency that can be withdrawn to your
						account and used in real life.
					</p>
				</div>

				<ActiveHex
					textClick={'click!'}
					textMore={'To learn more!'}
					subtitle={'Diamond Crusher'}
					text={`Diamonds are the hardest substances in nature and are not easy to crush. This machine is specially designed for crushing diamonds and turning them into ore.`}
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
		</section>
	);
};
