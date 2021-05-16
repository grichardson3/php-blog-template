<style>
	<?php
		echo 
			".bg-dark, .desktopHeader { background-color:" . $navColor . ";}" .
			"footer { background-color:" . $footerColor . ";}" .
			"a { font-family:" . $fontFamilyParagraph . ";}" .
			"h1, h2, h3, h4, h5, h6 { font-family:" . $fontFamilyHeading . ";}" .
			".btn { background-color:" . $buttonColor . "; border-color:" . $buttonColor . ";}";
		if ($darkMode === true) {
			echo 
			"@media (prefers-color-scheme: dark) {
				body {
					background-color: #222;
				}
				a {
					color: white;
				}
				a:hover {
					color: #aaa;
				}
				h1, h2, h3, h4, h5, h6, label, p, small {
					color: white;
				}
			}";
		}
		if ($logoAsTitle === false) {
			echo "#myCarousel { padding-top: 3.5em; }";
		}
	?>
</style>