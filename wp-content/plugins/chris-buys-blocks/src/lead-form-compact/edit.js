import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import "./editor.css";

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<h3>
				{__("Lead Form Compact", "chris-buys")}
			</h3>
		</div>
	);
}
