import { HexTwoRows } from '../../../common/hexTwoRows/hexTwoRows';
import { WhiteBtn } from '../../../common/whiteBtn/whiteBtn';
import s from './playSabversum.module.css';

export const PlaySabversum = () => {
	const hexGrid = {
		firstRow: [
			{ q: -5, s: 1, r: 0, invisible: true },
			{ q: -4, s: 1, r: 0, invisible: false },
			{ q: -3, s: 1, r: 0, invisible: false },
			{ q: -2, s: 1, r: 0, invisible: false },
			{ q: -1, s: 1, r: 0, invisible: false },
			{ q: 0, s: 0, r: 0, invisible: false },
			{ q: 1, s: 1, r: 0, invisible: false },
			{ q: 2, s: 1, r: 0, invisible: false },
			{ q: 3, s: 1, r: 0, invisible: false },
			{ q: 4, s: 1, r: 0, invisible: false },
			{ q: 5, s: 1, r: 0, invisible: false },
		],
		secondRow: [
			{ q: -5, s: 1, r: 0, invisible: false },
			{ q: -4, s: 1, r: 0, invisible: true },
			{ q: -3, s: 1, r: 0, invisible: true },
			{ q: -2, s: 1, r: 0, invisible: true },
			{ q: -1, s: 1, r: 0, invisible: true },
			{ q: 0, s: 0, r: 0, invisible: true },
			{ q: 1, s: 1, r: 0, invisible: true },
			{ q: 2, s: 1, r: 0, invisible: true },
			{ q: 3, s: 1, r: 0, invisible: true },
			{ q: 4, s: 1, r: 0, invisible: true },
		],
		thirdRow: [
			{ q: -5, s: 1, r: 0, invisible: true },
			{ q: -4, s: 1, r: 0, invisible: false },
			{ q: -3, s: 1, r: 0, invisible: false },
			{ q: -2, s: 1, r: 0, invisible: false },
			{ q: -1, s: 1, r: 0, invisible: true },
			{ q: 0, s: 0, r: 0, invisible: true },
			{ q: 1, s: 1, r: 0, invisible: true },
			{ q: 2, s: 1, r: 0, invisible: true },
			{ q: 3, s: 1, r: 0, invisible: false },
			{ q: 4, s: 1, r: 0, invisible: false },
			{ q: 5, s: 1, r: 0, invisible: false },
		],
		fourthRow: [
			{ q: -5, s: 1, r: 0, invisible: false },
			{ q: -4, s: 1, r: 0, invisible: false },
			{ q: -3, s: 1, r: 0, invisible: false },
			{ q: -2, s: 1, r: 0, invisible: false },
			{ q: -1, s: 1, r: 0, invisible: false },
			{ q: 0, s: 0, r: 0, invisible: false },
			{ q: 1, s: 1, r: 0, invisible: false },
			{ q: 2, s: 1, r: 0, invisible: false },
			{ q: 3, s: 1, r: 0, invisible: false },
			{ q: 4, s: 1, r: 0, invisible: false },
		],
		fifthRow: [
			{ q: -5, s: 1, r: 0, invisible: true },
			{ q: -4, s: 1, r: 0, invisible: false },
			{ q: -3, s: 1, r: 0, invisible: false },
			{ q: -2, s: 1, r: 0, invisible: false },
			{ q: -1, s: 1, r: 0, invisible: false },
			{ q: 0, s: 0, r: 0, invisible: false },
			{ q: 1, s: 1, r: 0, invisible: false },
			{ q: 2, s: 1, r: 0, invisible: false },
			{ q: 3, s: 1, r: 0, invisible: false },
			{ q: 4, s: 1, r: 0, invisible: false },
			{ q: 5, s: 1, r: 0, invisible: false },
		],
		sixthRow: [
			{ q: -5, s: 1, r: 0, invisible: false },
			{ q: -4, s: 1, r: 0, invisible: false },
			{ q: -3, s: 1, r: 0, invisible: false },
			{ q: -2, s: 1, r: 0, invisible: false },
			{ q: -1, s: 1, r: 0, invisible: false },
			{ q: 0, s: 0, r: 0, invisible: false },
			{ q: 1, s: 1, r: 0, invisible: false },
			{ q: 2, s: 1, r: 0, invisible: false },
			{ q: 3, s: 1, r: 0, invisible: false },
			{ q: 4, s: 1, r: 0, invisible: false },
		],
	};

	return (
		<section>
			<div className={`positionContainer`}>
				<div className={s.info}>
					<h2 className={`title ${s.title}`}>
						Learn the latest ways to make money in the most fun and rewarding
						way:
					</h2>

					<WhiteBtn text={'PLAY SABVERSUM'} classes={s.btn} />
				</div>
			</div>

			<HexTwoRows rowTop={hexGrid.firstRow} rowBtm={hexGrid.secondRow} />
			<HexTwoRows rowTop={hexGrid.thirdRow} rowBtm={hexGrid.fourthRow} />
			<HexTwoRows rowTop={hexGrid.fifthRow} rowBtm={hexGrid.sixthRow} />
		</section>
	);
};
