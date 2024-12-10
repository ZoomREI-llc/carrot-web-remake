import { useBlockProps } from "@wordpress/block-editor";
import "./editor.css";

export default function Edit() {
	return (
		<div {...useBlockProps()}>
			<h3>Cookie banner</h3>
		</div>
	);
}
