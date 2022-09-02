import { HexTwoRows } from '../../../common/hexTwoRows/hexTwoRows';
import s from './community.module.css';
import { useState } from 'react';
import { ActiveHex } from '../../../common/activeHex/activeHex';
import home from '../../../../img/mainPage/home.png';

export const Community = () => {
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
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		fourthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 3, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 4, s: 1, invisible: false },
		],
		fifthRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 3, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 4, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 5, s: 1, invisible: false },
		],
		sixthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: false },
			{
				q: 1,
				s: 1,
				invisible: sevenLearnMore,
				click: sevenLearnMore === 'white' ? () => clickSevenLearnMore() : false,
			},
			{ q: 2, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 3, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 4, s: 1, invisible: false },
		],
		seventhRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: false },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 2, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 3, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		eighthRow: [
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
	};

	return (
		<section>
			<div className={`positionContainer`}>
				<h2 className={`title ${s.title}`}>
					Join our community on Discord, Twitter, Telegram. Get started in the
					anti-world by participating in a variety of Subversum events and
					securing initial capital
				</h2>

				<div className={s.info}>
					<h3 className={`subtitle`}>Ecology</h3>

					<p className={`text`}>
						ESG (Environmental, Social, and Governance) criteria are an
						important aspect of the modern business approach. Subversum gives
						you the opportunity not only to develop an environmental mindset and
						avoid investment losses, but also to participate in a real
						environmental program. Three million game tokens will be donated to
						European eco-funds as part of the project.
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
			<HexTwoRows rowTop={hexGrid.seventhRow} rowBtm={hexGrid.eighthRow} />
		</section>
	);
};
