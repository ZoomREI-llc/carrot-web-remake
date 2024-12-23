import { __ } from "@wordpress/i18n";
import {
	InnerBlocks,
	useBlockProps,
	InspectorControls,
} from "@wordpress/block-editor";
import { PanelBody, TextControl } from "@wordpress/components";
import "./editor.css";


export default function Edit({ attributes, setAttributes }) {
	const { phoneNumber } = attributes;

	const onChangePhoneNumber = (value) => {
		setAttributes({ phoneNumber: value });
	};

	return (
		<div {...useBlockProps()}>
			<h3>{__("FAQ Form", "cw-universal")}</h3>

			<InspectorControls>
				<PanelBody
					title={__("FAQ Form Settings", "cw-universal-blocks")}
					initialOpen={true}
				>
					<TextControl
						label={__("Phone Number", "cw-universal-blocks")}
						value={phoneNumber}
						onChange={onChangePhoneNumber}
						placeholder={__("Enter phone number", "cw-universal-blocks")}
					/>
				</PanelBody>
			</InspectorControls>

			<InnerBlocks />
		</div>
	);
}
