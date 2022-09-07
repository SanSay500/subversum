import { NavLink } from 'react-router-dom';
import s from './footer.module.css';
import logo from '../../img/logo.svg';
import linkedin from '../../img/socialNetworksLogo/linkedin.svg';
import discord from '../../img/socialNetworksLogo/discord.svg';
import facebook from '../../img/socialNetworksLogo/facebook.svg';
import medium from '../../img/socialNetworksLogo/medium.svg';
import twitter from '../../img/socialNetworksLogo/twitter.svg';
import youtube from '../../img/socialNetworksLogo/youtube.svg';

export const Footer = () => {
	return (
		<footer className={s.container}>
			<nav className={s.navigation}>
				<div className={`${s.link}`}>NFT List</div>
				<div className={`${s.link}`}>Wallet</div>
				<div className={`${s.link}`}>PLAY</div>
				<div className={`${s.link}`}>Key numbers</div>
				<img src={`${logo}`} className={s.logo} />
				<div className={`${s.link}`}>Account</div>
				<div className={`${s.link}`}>My NFT</div>
				<div className={`${s.link}`}>Learn</div>
				<div className={`${s.link}`}>Events</div>
			</nav>

			<div className={`${s.socialNetworkContainer}`}>
				<a href='#'>
					<img className={s.socialNetworkImg} src={linkedin} />
				</a>
				<a href='#'>
					<img className={s.socialNetworkImg} src={discord} />
				</a>
				<a href='#'>
					<img className={s.socialNetworkImg} src={twitter} />
				</a>
				<a href='#'>
					<img className={s.socialNetworkImg} src={youtube} />
				</a>
				<a href='#'>
					<img className={s.socialNetworkImg} src={medium} />
				</a>
				<a href='#'>
					<img className={s.socialNetworkImg} src={facebook} />
				</a>
			</div>

			<div className={s.footerBtm}>
				<div>
					<p className={s.text}>Privacy Policy</p>
					<p className={s.text}>site project by Aleksandra Abelha</p>
				</div>

				<p className={s.text}>info@subversum.space</p>
			</div>
		</footer>
	);
};
