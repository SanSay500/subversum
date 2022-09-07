import { HexTwoRows } from '../../../common/hexTwoRows/hexTwoRows';
import s from './playAndGetProfit.module.css';
import { useState } from 'react';
import { ActiveHex } from '../../../common/activeHex/activeHex';
import home from '../../../../img/mainPage/home.png';

export const PlayAndGetProfit = () => {
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
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: true },
			{ q: 3, s: 1, invisible: true },
			{ q: 4, s: 1, invisible: false },
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
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
			{ q: 3, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
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
			{ q: 1, s: 1, invisible: whiteSeven, click: () => clickSevenHex() },
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
			{
				q: 4,
				s: 1,

				invisible: sevenLearnMore,
				click: sevenLearnMore === 'white' ? () => clickSevenLearnMore() : false,
			},
			{ q: 5, s: 1, invisible: false },
		],
		sixthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 2, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 3, s: 1, invisible: sevenLearnMoreInfo },
			{ q: 4, s: 1, invisible: false },
		],
		seventhRow: [
			{ q: -5, s: 1, invisible: true },
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
		eighthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: false },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: true },
			{ q: 3, s: 1, invisible: true },
			{ q: 4, s: 1, invisible: false },
		],
		ninthRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: whiteThree, click: () => clickThreeHex() },
			{ q: -3, s: 1, invisible: whiteThree, click: () => clickThreeHex() },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: true },
			{ q: 3, s: 1, invisible: true },
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		tenthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: whiteThree, click: () => clickThreeHex() },
			{
				q: -3,
				s: 1,

				invisible: threeLearnMore,
				click: threeLearnMore === 'white' ? () => clickThreeLearnMore() : false,
			},
			{ q: -2, s: 1, invisible: false },
			{ q: -1, s: 1, invisible: false },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
		],
		eleventhRow: [
			{ q: -5, s: 1, invisible: true },
			{ q: -4, s: 1, invisible: false },
			{ q: -3, s: 1, invisible: threeLearnMoreInfo },
			{ q: -2, s: 1, invisible: threeLearnMoreInfo },
			{ q: -1, s: 1, invisible: threeLearnMoreInfo },
			{ q: 0, s: 0, invisible: false },
			{ q: 1, s: 1, invisible: false },
			{ q: 2, s: 1, invisible: false },
			{ q: 3, s: 1, invisible: false },
			{ q: 4, s: 1, invisible: false },
			{ q: 5, s: 1, invisible: false },
		],
		twelfthRow: [
			{ q: -5, s: 1, invisible: false },
			{ q: -4, s: 1, invisible: true },
			{ q: -3, s: 1, invisible: true },
			{ q: -2, s: 1, invisible: true },
			{ q: -1, s: 1, invisible: true },
			{ q: 0, s: 0, invisible: true },
			{ q: 1, s: 1, invisible: true },
			{ q: 2, s: 1, invisible: true },
			{ q: 3, s: 1, invisible: true },
			{ q: 4, s: 1, invisible: true },
		],
	};

	return (
		<section>
			<div className={`positionContainer`}>
				<h2 className={`title ${s.title}`}>
					Play in a parallel world — get real profit
				</h2>

				<div className={s.info}>
					<h3 className={`subtitle`}>Be the reason for change</h3>

					<p className={`text`}>
						Become a source of valuable resources and invaluable deeds by
						feeling yourself in a new way. With the combination of a
						decentralized system, NFT technology, and ESG approach, you can
						build a business and become the cause of a better future - for
						yourself, for the community, for the planet.
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
			<HexTwoRows rowTop={hexGrid.ninthRow} rowBtm={hexGrid.tenthRow} />
			<HexTwoRows rowTop={hexGrid.eleventhRow} rowBtm={hexGrid.twelfthRow} />

			<div className={`positionContainer`}>
				<p className={`text ${s.btmText}`}>
					Enjoy multi-level game difficulty. There is much that depends on the
					active actions of each participant and the collective decision of the
					community: the cost of the token, the ecological balance of the
					planet, the volume of NFT collections in the game, and the future
					development of Subversum Industries.
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
