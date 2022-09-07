import s from './header.module.css';
import userMenuLogo from '../../img/mainPage/header/userMenuLogo.svg';
import logo from '../../img/logo.svg';
import { WhiteBtn } from '../common/whiteBtn/whiteBtn';
import { useRef, useState } from 'react';
import { Transition } from 'react-spring/renderprops';

export const Header = () => {
	const menuToggle = useRef();

	const [openMenu, setOpenMenu] = useState(false);
	const [openUserMenu, setOpenUserMenu] = useState(false);

	const handlerClickMenu = () => {
		setOpenMenu(!openMenu);
		setOpenUserMenu(false);
	};
	const handlerClickUserMenu = () => {
		menuToggle.current.checked = false;
		setOpenMenu(false);
		setOpenUserMenu(!openUserMenu);
	};

	return (
		<header className={s.container}>
			<div className={s.navContainer}>
				<div className={s.navContainerLeft}>
					<WhiteBtn text={'PLAY'} />

					<div className={`${s.btnMenu}`}>
						MENU
						<input ref={menuToggle} id={s.menuToggle} type='checkbox' />
						<label
							className={s.menuToggleLabel}
							htmlFor={s.menuToggle}
							onClick={() => handlerClickMenu()}
						/>
						<div className={s.burgerMenu}></div>
						<Transition
							items={openMenu}
							from={{ width: 0 }}
							enter={{ width: 'auto' }}
							leave={{ width: 0 }}
							config={{ duration: 400 }}>
							{(open) =>
								open &&
								((style) => (
									<nav style={style} className={`${s.navigation}`}>
										<a className={s.navigationItem}>Learn</a>
										<a className={s.navigationItem}>NFT List</a>
										<a className={s.navigationItem}>Community</a>
										<a className={s.navigationItem}>Key numbers</a>
										<a className={s.navigationItem}>Events</a>
									</nav>
								))
							}
						</Transition>
					</div>
				</div>

				<div className={s.userMenuContainer}>
					<Transition
						items={openUserMenu}
						from={{ width: 0 }}
						enter={{ width: 'auto' }}
						leave={{ width: 0 }}
						config={{ duration: 400 }}>
						{(open) =>
							open &&
							((style) => (
								<nav style={style} className={s.userMenu}>
									<a className={s.navigationItem}>My NFT</a>
									<a className={s.navigationItem}>Wallet</a>
									<a className={s.navigationItem}>Account</a>
								</nav>
							))
						}
					</Transition>

					<img
						src={`${userMenuLogo}`}
						className={s.userMenuLogo}
						onClick={() => handlerClickUserMenu()}
					/>
				</div>
			</div>

			<div className={s.content}>
				<img src={`${logo}`} />

				<p className={s.text}>
					iNFiniTy i NFTnity. In a parallel reality, find out how it works
				</p>
			</div>

			<div className={`${s.bgrBtm}`}></div>
		</header>
	);
};
