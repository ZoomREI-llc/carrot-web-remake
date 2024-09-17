import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import "./editor.css";

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<h3>{__("Our mission (cb-oc-page)", "carrot-blocks")}</h3>
		</div>
	);
}
