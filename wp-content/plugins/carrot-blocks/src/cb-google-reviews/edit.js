import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import {
	PanelBody,
	TextControl,
	TextareaControl,
	SelectControl,
} from "@wordpress/components";
import "./editor.css";

export default function Edit({ attributes, setAttributes }) {
	const { reviewText, reviewerName, selectedDirection } = attributes;

	const onChangeReviewText = (newReviewText) => {
		setAttributes({ reviewText: newReviewText });
	};

	const onChangeReviewerName = (newReviewerName) => {
		setAttributes({ reviewerName: newReviewerName });
	};

	const onChangeSelectedDirection = (newDirection) => {
		setAttributes({ selectedDirection: newDirection });
	};

	return (
		<div {...useBlockProps()}>
			<InspectorControls>
				<PanelBody
					title={__("Review Settings", "carrot-blocks")}
					initialOpen={true}
				>
					<TextControl
						label={__("Reviewer Name", "carrot-blocks")}
						value={reviewerName}
						onChange={onChangeReviewerName}
						placeholder={__("Enter reviewer name", "carrot-blocks")}
					/>
					<TextareaControl
						label={__("Review Text", "carrot-blocks")}
						value={reviewText}
						onChange={onChangeReviewText}
						placeholder={__("Enter review text", "carrot-blocks")}
						rows={5} // Adjust the number of rows to control height of the textarea
					/>
				</PanelBody>
				<PanelBody
					title={__("Direction Select", "carrot-blocks")}
					initialOpen={true}
				>
					<SelectControl
						label={__("Select Direction", "carrot-blocks")}
						value={selectedDirection}
						options={[
							{ label: "Left to Right", value: "ltr" },
							{ label: "Right to Left", value: "rtl" },
						]}
						onChange={onChangeSelectedDirection}
					/>
				</PanelBody>
			</InspectorControls>
			<h3>{__("Carrot Google Reviews (cb-syh-page)", "carrot-blocks")}</h3>
		</div>
	);
}
