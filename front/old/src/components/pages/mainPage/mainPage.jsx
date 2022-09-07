import s from './mainPage.module.css';
import { Header } from '../../header/header';
import { Footer } from '../../footer/footer';
import { FuturePlanet } from './futurePlanet/futurePlanet';
import { PlayAndGetProfit } from './playAndGetProfit/playAndGetProfit';
import { Community } from './community/community';
import { YourIncome } from './yourIncome/yourIncome';
import { PlaySabversum } from './playSabversum/playSabversum';

export const MainPage = () => {
	return (
		<div>
			<Header />
			<div className={s.bgr}>
				<main>
					<FuturePlanet />
					<PlayAndGetProfit />
					<Community />
					<YourIncome />
					<PlaySabversum />
				</main>
				<Footer />
			</div>
		</div>
	);
};
