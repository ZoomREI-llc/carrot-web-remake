import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import "./editor.css";

export default function Edit() {

	return (
		<div {...useBlockProps()}>

			<h3>{__("Blog category", "cw-universal")}</h3>
		</div>
	);
}
