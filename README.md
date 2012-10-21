# KirbyCMS-Extension-navBuilder

This is a **snippet** for [Kirby CMS](http://getkirby.com/ "Kirby") that generates a beautiful nested navigation (unordered list) to your site.

## Installation
Copy **navBuilder.php** into your **/site/snippets/** folder.

## Usage

	<?php snippet('navBuilder'[, array('maxLevel' => int, 'entryPoint' => 'string')]) ?>

The **array** with *maxLevel* and *entryPoint* is optional. This lets you define the maximum output level or a specific entry point.

## Examples

Given is the following exemplary hierarchy (the folders in your **content** directory):

----------
- 01-Level-1-One
- 02-Level-1-Two
	- 01-Level-2-One
	- 02-Level-2-Two
	- 03-Level-2-Three
		- 01-Level-3-One
			- 01-Level-4-One
			- 02-Level-4-Two
				- 01-Level-5-One
				- 02-Level-5-Two
				- 03-Level-5-Three
			- 03-Level-4-Three
		- 02-Level-3-Two
		- 03-Level-3-Three
- 03-Level-1-Three

----------

Calling `<?php snippet('navBuilder') ?>` gives you the following (*unedited!*) output:

----------
	<ul>
		<li class="nav-level-1"><a href="http://localhost/Level-1-One">Level-1-One</a></li>
		<li class="nav-level-1 has-sub">
			<a href="http://localhost/Level-1-Two">Level-1-Two</a>
			<ul class="is-child">
				<li class="nav-level-2"><a href="http://localhost/Level-1-Two/Level-2-One">Level-2-One</a></li>
				<li class="nav-level-2"><a href="http://localhost/Level-1-Two/Level-2-Two">Level-2-Two</a></li>
				<li class="nav-level-2 has-sub">
					<a href="http://localhost/Level-1-Two/Level-2-Three">Level-2-Three</a>
					<ul class="is-child">
						<li class="nav-level-3 has-sub">
							<a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-One">Level-3-One</a>
							<ul class="is-child">
								<li class="nav-level-4"><a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-One/Level-4-One">Level-4-One</a></li>
								<li class="nav-level-4 has-sub">
									<a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two">Level-4-Two</a>
									<ul class="is-child">
										<li class="nav-level-5"><a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two/Level-5-One">Level-5-One</a></li>
										<li class="nav-level-5"><a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two/Level-5-Two">Level-5-Two</a></li>
										<li class="nav-level-5"><a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two/Level-5-Three">Level-5-Three</a></li>
									</ul>
								</li>
								<li class="nav-level-4"><a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Three">Level-4-Three</a></li>
							</ul>
						</li>
						<li class="nav-level-3"><a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-Two">Level-3-Two</a></li>
						<li class="nav-level-3"><a href="http://localhost/Level-1-Two/Level-2-Three/Level-3-Three">Level-3-Three</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li class="nav-level-1"><a href="http://localhost/Level-1-Three">Level-1-Three</a></li>
	</ul>

----------

Calling `<?php snippet('navBuilder', array('maxLevel' => 3)) ?>` gives you the following (*unedited!*) output:

----------
	<ul>
		<li class="nav-level-1"><a href="http://localhost/knowledge/Level-1-One">Level-1-One</a></li>
		<li class="nav-level-1 has-sub">
			<a href="http://localhost/knowledge/Level-1-Two">Level-1-Two</a>
			<ul class="is-child">
				<li class="nav-level-2"><a href="http://localhost/knowledge/Level-1-Two/Level-2-One">Level-2-One</a></li>
				<li class="nav-level-2"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Two">Level-2-Two</a></li>
				<li class="nav-level-2 has-sub">
					<a href="http://localhost/knowledge/Level-1-Two/Level-2-Three">Level-2-Three</a>
					<ul class="is-child">
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One">Level-3-One</a></li>
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-Two">Level-3-Two</a></li>
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-Three">Level-3-Three</a></li>
					</ul>
				</li>
			</ul>
		</li>
		<li class="nav-level-1"><a href="http://localhost/knowledge/Level-1-Three">Level-1-Three</a></li>
	</ul>

----------


Calling `<?php snippet('navBuilder', array('entryPoint' => 'Level-1-Two')) ?>` gives you the following (*unedited!*) output:

----------
	<ul>
			<li class="nav-level-2"><a href="http://localhost/knowledge/Level-1-Two/Level-2-One">Level-2-One</a></li>
			<li class="nav-level-2"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Two">Level-2-Two</a></li>
			<li class="nav-level-2 has-sub">
				<a href="http://localhost/knowledge/Level-1-Two/Level-2-Three">Level-2-Three</a>
				<ul class="is-child">
						<li class="nav-level-3 has-sub">
							<a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One">Level-3-One</a>
							<ul class="is-child">
								<li class="nav-level-4"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One/Level-4-One">Level-4-One</a></li>
								<li class="nav-level-4 has-sub">
									<a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two">Level-4-Two</a>
									<ul class="is-child">
										<li class="nav-level-5"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two/Level-5-One">Level-5-One</a></li>
										<li class="nav-level-5"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two/Level-5-Two">Level-5-Two</a></li>
										<li class="nav-level-5"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Two/Level-5-Three">Level-5-Three</a></li>
									</ul>
								</li>
								<li class="nav-level-4"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One/Level-4-Three">Level-4-Three</a></li>
							</ul>
						</li>
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-Two">Level-3-Two</a></li>
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-Three">Level-3-Three</a></li>
					</ul>
			</li>
	</ul>

----------

Calling `<?php snippet('navBuilder', array('maxLevel' => 3, 'entryPoint' => 'Level-1-Two')) ?>` gives you the following (*unedited!*) output:

----------
	<ul>
			<li class="nav-level-2"><a href="http://localhost/knowledge/Level-1-Two/Level-2-One">Level-2-One</a></li>
			<li class="nav-level-2"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Two">Level-2-Two</a></li>
			<li class="nav-level-2 has-sub">
				<a href="http://localhost/knowledge/Level-1-Two/Level-2-Three">Level-2-Three</a>
				<ul class="is-child">
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-One">Level-3-One</a></li>
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-Two">Level-3-Two</a></li>
						<li class="nav-level-3"><a href="http://localhost/knowledge/Level-1-Two/Level-2-Three/Level-3-Three">Level-3-Three</a></li>
					</ul>
			</li>
	</ul>

----------

## Why? There is already **treemenu.php** available!
Yeah, I know. :( I missed that one totally before I created **navBuilder**.

## Author
[Fabian Beiner](http://fabian-beiner.de)