<style>
			.header-fix {
				background: rgba(255,255,255,0.7);
				padding: 20px 20px 20px 30px;
				z-index: 5;
				/* position: relative; */
				position: fixed;
				top:0px;
				width: 100%;
			}
			.header-fix .header_content {
				display: flex;
				justify-content: space-between;
				/* align-items: center; */
				align-items: start;
			}
			.headerlogo {
				display: flex;
				align-items: start;
			}
			img.newlogo {
				width: 360px;
				margin: 0 0px;
			}
			.link {
				font-size: 10px;
				color: #03f;
				padding-left: 20px;
				display: block;
				text-align: right;
			}
			header#header {
				margin-top: 120px;
			}
			.headerin {
				align-items: start;
			}
			@media (max-width: 767px) {
				.headerlogo {
					display: flex;
					flex-direction: column;
				}
				.hearder_info {
					display: none;
				}
				.hearder_info_mobile {
					display: flex;
					flex-direction: row;
					margin-top: 16px;
					padding: 0px;
					align-items: start;
				}
				.hearder_info_mobile img.newlogo {
					width: 170px;
					margin: 20px 0 0 6px;
				}
				.hearder_info_mobile span {
					color: #03f;
					margin-right: 10px;
					font-size: 12px;
				}
				.hearder_info_mobile span.l {
					font-size: 14px;
					font-weight: 600;
					color: black;
				}
				header#header {
				margin-top: 180px;
			}
			}
			@media (max-width: 1100px) {
				.hearder_info br {
					display: inline;
				}
			}
		}
		</style>
		<div class="header-fix">
			<div class="header_content">
				<h1 class="headerlogo">
					<a href="index.html" class="op"><img class="newlogo" src="img/common/new_logo_matsumoto.png" alt="エコネコル"></a>
				</h1>
			
				<p class="navbar-toggle" data-target=".navbar-collapse"><img src="img/common/open_menu.svg" alt=""></p>
				<nav class="navbar-collapse">
					<p class="menuclose"><span class="closein"><img src="img/common/close_menu.svg" alt=""></span></p>
					<!-- <p class="menumain"><img src="img/common/main_menu.jpg" alt=""></p> -->
					<div class="menucont">
						<ul class="menulist">
							<li><a href="omotikomi.html">不用品お持ち込み</a></li>
							<li><a href="mbox.html">もったいないBOX</a></li>
							<li><a href="katazuketai.html">かたづけ隊</a></li>
							<li><a href="kaden.html">家電4品目</a></li>
							<!-- <li><a href="kaitai.html">家屋解体</a></li> -->
							<li><a href="qa.html">よくあるご質問</a></li>
							<!-- <li><a href="everyone.html">企業のみなさまへ</a></li>
							<li><a href="company.html">会社案内</a></li> -->
							<li><a href="https://matsumoto.econecol.co.jp/osirase.html">お知らせ</a></li>
							<li><a href="https://matsumoto.econecol.co.jp/wp2025/contact/">お問合せ</a></li>
						</ul>
					</div>
					<p class="menubtn">閉じる</p>
				</nav>
			</div>
		
			
		</div>	
		<header id="header">
			<p class="breadcrumb"><?php echo $page_title ?></p>
			<p class="visible-ts"></p>
		</header>